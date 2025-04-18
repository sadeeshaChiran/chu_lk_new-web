<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\Courier;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product_Sale;
use App\Models\PackingSlip;
use App\Models\PackingSlipProduct;
use App\Models\Product;
use App\Models\Product_Warehouse;
use App\Models\Variant;
use App\Models\ProductVariant;
use App\Models\Delivery;
use Auth;
use DB;
use Illuminate\Support\Facades\Http;

class PackingSlipController extends Controller
{
    public function index()
    {
        return view('backend.packing_slip.index');
    }

    public function packingSlipData(Request $request)
    {
        $columns = array(
            1 => 'reference_no',
            4 => 'amount',
        );

        $totalData = PackingSlip::count();
        $totalFiltered = $totalData;

        if ($request->input('length') != -1)
            $limit = $request->input('length');
        else
            $limit = $totalData;
        $start = $request->input('start');
        $order = 'packing_slips.' . $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $packing_slips = PackingSlip::with('sale', 'delivery', 'products', 'user')->offset($start)
                ->limit($limit)
                ->orderBy(DB::raw('CAST(' . $order . ' AS SIGNED)'), $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            if ($search[0] == 'p' || $search[0] == 'P')
                $search = substr($search, 1);
            elseif ($search[0] == 'n' || $search[0] == 'N')
                $search = strtoupper($search);

            $packing_slips = PackingSlip::select('packing_slips.*')
                ->with('sale', 'delivery', 'products')
                ->join('sales', 'packing_slips.sale_id', '=', 'sales.id')
                ->join('users', 'packing_slips.user_id', '=', 'users.id')
                ->where('users.name', 'LIKE', "%{$search}%")
                ->where('packing_slips.reference_no', 'LIKE', "%{$search}%")
                ->orwhere('sales.reference_no', 'LIKE', "%{$search}%")
                ->orwhere('packing_slips.waybill_id', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy(DB::raw('CAST(' . $order . ' AS SIGNED)'), $dir)
                ->get();

            $totalFiltered = PackingSlip::join('sales', 'packing_slips.sale_id', '=', 'sales.id')
                ->where('packing_slips.reference_no', 'LIKE', "%{$search}%")
                ->orwhere('sales.reference_no', 'LIKE', "%{$search}%")
                ->orwhere('packing_slips.waybill_id', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($packing_slips)) {
            foreach ($packing_slips as $key => $packing_slip) {
                $nestedData['id'] = $packing_slip->id;
                $nestedData['reference'] = 'P' . $packing_slip->reference_no;
                $nestedData['sale_reference'] = $packing_slip->sale->reference_no;
                $nestedData['delivery_reference'] = $packing_slip->delivery->reference_no;
                $nestedData['waybill_id'] = $packing_slip->waybill_id ? $packing_slip->waybill_id : 'N/A';
                $nestedData['created_by'] = $packing_slip->user->name;
                $nestedData['created_at'] = date('d-m-Y', strtotime($packing_slip->created_at));
                //$nestedData['delivery_reference'] = 'j';
                $nestedData['amount'] = $packing_slip->amount;
                $nestedData['item_list'] = '';
                $packing_slip_product = PackingSlipProduct::where([
                    ['packing_slip_id', $packing_slip->id],
                ])->get();
                foreach ($packing_slip->products as $index => $product) {
                    $variant_id = $packing_slip_product[$index]->variant_id;
                    if ($variant_id) {
                        $variant = Variant::find($variant_id);
                        $product->name .= ' [' . $variant->name . ']';
                    }
                    if ($index)
                        $nestedData['item_list'] .= ', ' . $product->name;
                    else
                        $nestedData['item_list'] = $product->name;
                }

                if ($packing_slip->status == 'In Transit')
                    $nestedData['status'] = '<div class="badge badge-warning">' . $packing_slip->status . '</div>';
                elseif ($packing_slip->status == 'Cancelled' || $packing_slip->status == 'Pending')
                    $nestedData['status'] = '<div class="badge badge-danger">' . $packing_slip->status . '</div>';
                else
                    $nestedData['status'] = '<div class="badge badge-success">' . $packing_slip->status . '</div>';

                $nestedData['options'] = '<div class="btn-group">
                                            <a target="_blank" class="btn btn-sm btn-primary" href="' . route('sale.invoice', $packing_slip->sale->id) . '" title="Generate Invoice"><i class="dripicons-document-new"></i></a>&nbsp;&nbsp;
                                            <a target="_blank" class="btn btn-sm btn-dark" href="' . route('packingSlip.genInvoice', $packing_slip->id) . '" title="Generate Shipping Label"><i class="dripicons-ticket"></i></a>&nbsp;&nbsp;';
                $nestedData['options'] .= \Form::open(["route" => ["packingSlip.delete", $packing_slip->id], "method" => "POST"]) . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()"><i class="dripicons-trash"></i> </button>' . \Form::close() . '</div>';

                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }


    public function createWaybillId($data)
    {
  
        $sale_id = $data['sale_id'];
        $amount = $data['amount'];
        $weight = $data['weight'];
        if ($weight < 2) {
            $weight = ceil($weight);
        } else {
            $weight = floor($weight);
        }

        $recipient_name = $data['recipient_name'];
        $recipient_contact_1 = $data['recipient_contact_1'];
        $recipient_contact_2 = $data['recipient_contact_2'];
        $recipient_address = $data['recipient_address'];
        $recipient_city = $data['recipient_city'];

        if ($recipient_contact_2) {
            $recipient_contact_2 = '';
        }

        $response = Http::asForm()->post('https://www.fdedomestic.com/api/parcel/new_api_v1.php', [
            'api_key' => 'c5d1493dbc629f6eb6e2',
            'client_id' => '2993',
            'order_id' => $sale_id,
            'parcel_weight' => (float) $weight,
            'parcel_description' => 'api sample',
            'recipient_name' => $recipient_name,
            'recipient_contact_1' => $recipient_contact_1,
            'recipient_contact_2' => $recipient_contact_2,
            'recipient_address' => $recipient_address,
            'recipient_city' => $recipient_city,
            'amount' => $amount,
            'exchange' => $data['is_exchange'],
        ]);


        return $response->json();
    }

    private function getErrorMessage($statusCode)
    {
        $errorMessages = [
            201 => 'Inactive Client',
            202 => 'Invalid order id',
            203 => 'Invalid weight',
            204 => 'Empty or invalid parcel description',
            205 => 'Empty or invalid name',
            206 => 'Contact number 1 is not valid',
            207 => 'Contact number 2 is not valid',
            208 => 'Empty or invalid address',
            209 => 'Invalid City',
            210 => 'Unsuccessful insert, try again',
            211 => 'Invalid API key',
            212 => 'Invalid or inactive client',
            213 => 'Invalid exchange value',
            214 => 'System maintain mode is activated',
        ];

        return $errorMessages[$statusCode] ?? 'Unknown error';
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_exchange'] = Sale::where('id', $data['sale_id'])->first()->is_exchange;
        $waybill_id = null;
        $courier_id = $data['courier_id'];
        $user_id = \Auth::id();
        $courier = Courier::where('id', $courier_id)->first();
        if ($courier->name == 'Main Courier') {
            $waybillId_response = $this->createWaybillId($data);
            if ($waybillId_response['status'] == 200) {
                // Success: Return the waybill_no or ID
                $waybill_id = $waybillId_response['waybill_no'];
            } else {
                // Error: Return the status code and message
                return redirect()->back()->with('error', $this->getErrorMessage($waybillId_response['status']) . ' in waybillId');
            }
        }else {
            if($data['waybill_id']) {
                $waybill_id = $data['waybill_id'];
            }
        }



        //return $data;
        $packing_slip = PackingSlip::latest()->first();
        if (in_array('ecommerce', explode(',', config('addons'))))
            $sale = Sale::with('customer')->select('id', 'sale_status', 'customer_id', 'warehouse_id', 'shipping_name', 'shipping_address', 'shipping_city', 'shipping_country', 'sale_type')->find($data['sale_id']);
        else
            $sale = Sale::with('customer')->select('id', 'sale_status', 'customer_id', 'warehouse_id')->find($data['sale_id']);

        if ($packing_slip)
            $reference_no = $packing_slip->reference_no + 1;
        else
            $reference_no = 1001;

        DB::beginTransaction();
        try {
            $packing_slip = PackingSlip::create([
                "reference_no" => $reference_no,
                "sale_id" => $data['sale_id'],
                "amount" => $data['amount'],
                "status" => "Pending",
                "waybill_id" => $waybill_id,
                "user_id" => $user_id,
            ]);

            foreach ($data['products'] as $key => $product_info) {

                $product_id =  explode("|", $product_info['product_id'])[0];

                $variant_id = null;
                if (!$variant_id) {
                    if ($sale->sale_type == 'online' || $sale->sale_type == 'website')
                        $variant_id = 0;
                    else
                        $variant_id = NULL;
                }

                PackingSlipProduct::create([
                    "packing_slip_id" => $packing_slip->id,
                    "product_id" => $product_id,
                    // "variant_id" => $variant_id
                ]);
                $product_sale_data = Product_Sale::where([
                    ['sale_id', $data['sale_id']],
                    ['product_id', $product_id],
                    // ['variant_id', $variant_id]
                ])->first();



                $product_sale_data->update(['is_packing' => true]);
                //deduct product quantity
                $product_data = Product::select('id', 'type', 'qty', 'product_list', 'variant_list', 'price_list', 'qty_list')->find($product_id);
                if ($product_data->type == 'combo') {
                    $product_list = explode(",", $product_data->product_list);
                    $variant_list = explode(",", $product_data->variant_list);
                    if ($product_data->variant_list)
                        $variant_list = explode(",", $product_data->variant_list);
                    else
                        $variant_list = [];
                    $qty_list = explode(",", $product_data->qty_list);
                    $price_list = explode(",", $product_data->price_list);

                    foreach ($product_list as $index => $child_id) {
                        $child_data = Product::find($child_id);
                        if (count($variant_list) && $variant_list[$index]) {
                            $child_product_variant_data = ProductVariant::where([
                                ['product_id', $child_id],
                                ['variant_id', $variant_list[$index]]
                            ])->first();

                            $child_warehouse_data = Product_Warehouse::where([
                                ['product_id', $child_id],
                                ['variant_id', $variant_list[$index]],
                                ['warehouse_id', $request->warehouse_id],
                            ])->first();

                            $child_product_variant_data->qty -= $product_sale_data->qty * $qty_list[$index];
                            $child_product_variant_data->save();
                        } else {
                            $child_warehouse_data = Product_Warehouse::where([
                                ['product_id', $child_id],
                                ['warehouse_id', $request->warehouse_id],
                            ])->first();
                        }

                        $child_data->qty -= $product_sale_data->qty * $qty_list[$index];
                        $child_warehouse_data->qty -= $product_sale_data->qty * $qty_list[$index];

                        $child_data->save();
                        $child_warehouse_data->save();
                    }
                } elseif ($product_data->type == 'standard') {
                    //deduct qty from product_warehouses table
                    $product_warehouse_data = Product_Warehouse::where([
                        ['product_id', $product_data->id],
                        ['warehouse_id', $request->warehouse_id],
                        // ['variant_id', $variant_id],
                    ])->first();
                    if ($product_warehouse_data) {
                        $product_warehouse_data->qty -= $product_sale_data->qty;
                        $product_warehouse_data->save();
                    }
                    //deduct qty from product_variants table
                    if ($variant_id) {
                        $product_vaiant_data = ProductVariant::where([
                            ['product_id', $product_id],
                            // ['variant_id', $variant_id]
                        ])->first();
                        $product_vaiant_data->qty -= $product_sale_data->qty;
                        $product_vaiant_data->save();
                    }
                    //deduct qty from products table
                    $product_data->qty -= $product_sale_data->qty;
                    $product_data->save();
                }
            }
            $delivery = Delivery::where('sale_id', $sale->id)->first();
            if (!$delivery) {
                //creating a new delivery
                $delivery = new Delivery();
                $delivery->reference_no = 'dr-' . date("Ymd") . '-' . date("his");
                $delivery->sale_id = $sale->id;
                $delivery->user_id = \Auth::id();
                if ($sale->shipping_address) {
                    $delivery->address = $sale->shipping_address;
                    if ($sale->shipping_city)
                        $delivery->address .= ', ' . $sale->shipping_city;
                    if ($sale->shipping_country)
                        $delivery->address .= ', ' . $sale->shipping_country;
                } elseif ($sale->customer->address)
                    $delivery->address = $sale->customer->address;
                else
                    $delivery->address = 'No address available';
                if ($sale->shipping_name) {
                    $delivery->recieved_by = $sale->shipping_name;
                }
                $delivery->status = 1;
                $delivery->packing_slip_ids = $packing_slip->id;
                $delivery->save();
            } else {
                $delivery->packing_slip_ids .= ',' . $packing_slip->id;
                $delivery->save();
            }
            //updating packing slip
            $packing_slip->delivery_id = $delivery->id;
            $packing_slip->save();
            //updating sale status
            $sale->sale_status = 1;
            $sale->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        $challan_data = [
            'packing_slip_list' => [$packing_slip->id],
            'amount_list' => [$data['amount']],
            'courier_id' => $data['courier_id'],
        ];
        $this->createChallan($challan_data);

        return redirect('packing-slips/invoice/' . $packing_slip->id);
        // return redirect()->route('sales.index', [
        //     'sale_status' => 2,
        // ])->with([
        //     'message' => 'Packing slip created successfully',
        //     'download_invoice' => $packing_slip->id // Pass the ID for downloading
        // ]);
    }

    public function createChallan($data)
    {
        //return $data;
        if (isset($data['created_at']))
            $data['created_at'] = date("Y-m-d H:i:s", strtotime($data['created_at']));
        else
            $data['created_at'] = date("Y-m-d H:i:s");
        $last_challan = Challan::orderBy('id', 'desc')->first();
        if ($last_challan)
            $data['reference_no'] = (int)$last_challan->reference_no + 1;
        else
            $data['reference_no'] = 1001;
        $data['status'] = 'Active';
        foreach ($data['packing_slip_list'] as $key => $packing_slip_id) {
            $packing_slip = PackingSlip::with('delivery')->select('id', 'status', 'delivery_id')->find($packing_slip_id);

            $packing_slip->delivery->status = 2;
            $packing_slip->delivery->courier_id = $data['courier_id'];
            $packing_slip->delivery->save();

            $packing_slip->status = 'In Transit';
            $packing_slip->save();
        }
        $data['packing_slip_list'] = implode(",", $data['packing_slip_list']);
        $data['amount_list'] = implode(",", $data['amount_list']);
        $data['created_by_id'] = Auth::id();
        Challan::create($data);
        return redirect()->route('challan.index')->with('message', 'Challan created successfully');
    }
    public function genInvoice($id)
    {
        $packing_slip = PackingSlip::with('sale.customer', 'sale.warehouse')->find($id);
        $sale = $packing_slip->sale;
        $packing_slip_product_data = PackingSlipProduct::where('packing_slip_id', $id)->get();
        $delivery_details = Delivery::with('courier')->find($packing_slip->delivery_id);

        return view('backend.packing_slip.invoice', compact('sale', 'packing_slip_product_data','delivery_details','packing_slip'));
    }

    public function delete($id)
    {
        $packing_slip_data = PackingSlip::with('sale')->find($id);
        $packing_slip_product_data = PackingSlipProduct::where('packing_slip_id', $id)->get();
        foreach ($packing_slip_product_data as $packingSlipProduct) {
            $product_data = Product::find($packingSlipProduct->product_id);
            $product_sale_data = Product_Sale::where([
                ['sale_id', $packing_slip_data->sale_id],
                ['product_id', $packingSlipProduct->product_id],
                ['variant_id', $packingSlipProduct->variant_id]
            ])->first();
            $product_warehouse_data = Product_Warehouse::where([
                ['product_id', $packingSlipProduct->product_id],
                ['warehouse_id', $packing_slip_data->sale->warehouse_id],
                ['variant_id', $packingSlipProduct->variant_id]
            ])->first();

            if ($packingSlipProduct->variant_id) {
                $product_variant_data = ProductVariant::where([
                    ['product_id', $packingSlipProduct->product_id],
                    ['variant_id', $packingSlipProduct->variant_id]
                ])->first();
                $product_variant_data->qty += $product_sale_data->qty;
                $product_variant_data->save();
            }

            $product_warehouse_data->qty += $product_sale_data->qty;
            $product_warehouse_data->save();

            $product_data->qty += $product_sale_data->qty;
            $product_data->save();

            $product_sale_data->is_packing = 0;
            $product_sale_data->save();

            $packingSlipProduct->delete();
        }
        $packing_slip_data->sale->sale_status = 2;
        $packing_slip_data->sale->save();
        $delivery_data = Delivery::where('sale_id', $packing_slip_data->sale_id)->first();
        if ($delivery_data) {
            $delivery_data->delete();
        }
        $packing_slip_data->delete();
        return redirect()->back()->with('message', 'Packing Slip deletes successfully');
    }
}
