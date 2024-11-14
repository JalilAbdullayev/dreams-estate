<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

trait SetData {
    public function changeOrder($model): JsonResponse {
        $order_data = request('data');
        try {
            DB::beginTransaction();
            foreach($order_data as $data) {
                $model::whereId($data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();
            return response()->json('sort_success');
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    public function changeStatus($model): JsonResponse {
        $data = $model::findOrFail(request()->id);
        $status = $data->status;
        $data->status = $status ? 0 : 1;
        $data->save();
        return response()->json(['success' => true]);
    }
}
