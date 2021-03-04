@extends('layouts.master')

@section('title', 'Import Users')
@section('content') 

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Open Excel Files</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="file" name="file" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

    </div>
</div>
@endsection