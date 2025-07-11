@extends('landing.publiclayout')
@section('title', 'seeting')
@section('content')

<div class="container mt-5 mb-3 ">
    <div class="row">
        <div class="col-md-3"></div>
        
        <div class="col-md-6 justify-content-end">
            <div class="card  shadow-sm">
                <div class="card-body">
                    <form action="{{ route('student.change.password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="password" name="current_password" placeholder="Current Password" class="mb-3 form-control">
                            </div>


                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="password" name="new_password" placeholder="New Password" class="mb-3 form-control">
                            </div>
                            <div class="col">
                                <input type="password" name="confirm_password" placeholder="Confirm New Password" class="mb-3 form-control">
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                           
                                <button type="submit" class="mb-3 btn btn-sm btn-primary">Update Password</button>
                        
                        </div>



                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection