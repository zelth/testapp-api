<?php

namespace App\Traits;

trait HttpResponses {
  protected function success($data, $message = null, $code = 200)
  {
    $data = $this->wrapData($data);
    return response()->json(array_merge([
      'status' => 'Request was successful.',
      'message' => $message,
    ], $data), $code);
  }
  
  protected function error($data, $message = null, $code) 
  {
    $data = $this->wrapData($data);
    return response()->json(array_merge([
      'status' => 'Error has occured...',
      'message' => $message,
      'data' => $data
    ], $data), $code);
  }

  private function wrapData($data)
  {
      if (!is_array($data)) {
          return ['data' => $data];
      }
      return $data;
  }
}