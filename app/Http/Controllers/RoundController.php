<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Round;
use DB, Log;

class RoundController extends Controller
{
    /**
     * Get users
     */
    public function index(Request $request)
    {
        $query = Round::query();
        $query->with('zone:id,zone_name');
        $query->with('user:id,user_name');
        $data = $query->get();

        return response()->json($data);
    }

    /**
     * Store the user
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $round = new Round;
        if ($round->isValid($data)) {
            DB::beginTransaction();
            try {
                // Validate User
                /* $producto = Producto::where('producto_referencia', $request->maquina_producto)->first();
                if (!$producto instanceof Producto) {
                    DB::rollback();
                    return response()->json(['success' => false, 'errors' => 'No es posible recuperar el producto.']);
                } */

                // Validate Zone
                /* $unique = Maquina::where('maquina_serie', $request->maquina_serie)->where('maquina_producto', $producto->id)->first();
                if ($unique instanceof Maquina) {
                    DB::rollback();
                    return response()->json(['success' => false, 'errors' => 'La serie ya se encuentra registrada.']);
                } */

                // Round
                $round->fill($data);
                $round->save();

                // Commit Transaction
                DB::commit();
                return response()->json(['success' => true, 'id' => $round->id]);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error($e->getMessage());
                // return response()->json(['success' => false, 'errors' => trans('app.exception')]);
            }
        }
        return response()->json(['success' => false, 'errors' => $round->errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}