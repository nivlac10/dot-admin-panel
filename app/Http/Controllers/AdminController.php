<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function getTransactions() {
        $req = Http::post('http://127.0.0.1:3333/api/admin/getTransactions');
        $data = json_decode($req);
        return view('transactions-management',compact('data'));
    }

    function showTransactionModal(Request $request) {
        $ajax = $request->post();
        $id = $ajax['id'];
        
        $req = Http::post('http://127.0.0.1:3333/api/admin/getSingleTransaction', ['id' => $id]);
        $data = $req->getBody();
        return $req;
    }

    function updateTransaction(Request $request) {
        $ajax = $request->post();
        $req = Http::post('http://127.0.0.1:3333/api/admin/updateTransaction', ['id' => $ajax['txid'], 'status' => $ajax['status'], 'method' => $ajax['method'], 'amount' => $ajax['amount'], 'uid' => $ajax['uid']]);
        $data = $req->getBody();
        $res = [];
        $res['status'] = $ajax['status'];
        return $res;
    }

    function getBetsHistory() {
        $req = Http::post('http://127.0.0.1:3333/api/admin/getBets');
        $data = json_decode($req);
        return view('bets-management',compact('data'));
    }

    function getRatesSchedule() {
        $req = Http::post('http://127.0.0.1:3333/api/admin/getRates');
        $data = json_decode($req);
        return view('crash-rates',compact('data'));
    }

    function getCrashHistory() {
        $req = Http::post('http://127.0.0.1:3333/api/admin/getCrashes');
        $data = json_decode($req);
        return view('crash-history',compact('data'));
    }

    function getBankDetails() {
        $id = 1;
        $req = Http::post('http://127.0.0.1:3333/api/admin/getBankDetails');
        $json = $req->getBody()->getContents();
        $data = json_decode($json, true);
        return view('bank-details', compact('data'));
    }

    function updateBankDetails(Request $request) {
        $requestData = $request->all();
        $id = 1;
        $req = Http::post('http://127.0.0.1:3333/api/admin/updateBankDetails', ['bank' => $requestData['bankName'], 'account' => $requestData['accountNumber'], 'id' => $id]);
        $json = $req->getBody()->getContents();
        
        $data = json_decode($json, true);
        $data = [$data];
        
        return view('bank-details', compact('data'));
    }
}
