@extends('master')

@section('container')
<div class='container'>
    <div class='col-sm-2'></div>
    <div class='col-sm-8'>
        <table class='table tbl-stripped' id='entry'>
            <tr>
                <td><input type='text' class='form-control entry1'></td>
                <td><input type='text' class='form-control entry2'></td>
                <td><input type='text' class='form-control entry3'></td>
            </tr>
        </table>
        <br><br>
        <div class='col-sm-4 text-center'>
        <button class='btn btn-default' onclick="insertRow()">Insert new row</button>
        </div>
        <div class='col-sm-4 text-center'>
        <button class='btn btn-danger' onclick="deleteRow()">Delete Entry!</button>
        </div>
        <div class='col-sm-4 text-center'>
        <button class='btn btn-success' onclick="Submit()">Submit!</button>
        </div>
    </div>
    <div class='col-sm-2'></div>
</div>
<br><hr><br>
<div class='container'>
    <div class='text-center' id='response'></div>
</div>
@endsection
