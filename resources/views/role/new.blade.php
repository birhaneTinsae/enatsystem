@extends('layouts.app')

@section('sidebar')
                        <ul class="list-group">
                            <li class="list-group-item disabled">Menu</li>
                            <li class="list-group-item"><a href="#" >Role List</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                            <li class="list-group-item"><a href="#" >ISD</a></li>
                        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
   
        <div class="col-md-10 ">
            <ol class="breadcrumb">
                <li><a href="home">Home</a></li>               
                <li class="active">New Role</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Role 

                    @can('close-role')                   
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-times" aria-hidden="true"></i>
                    Close</a>
                    @endcan

                    @can('update-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update</a>
                    @endcan

                    @can('delete-role')
                    <a href="" class="text-right pull-right panel-menu-item"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</a>
                    @endcan

                   
                    <a href=""   class="text-right pull-right panel-menu-item"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        Add</a>
                   
                
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/role" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="role-name">Role Name</label>
                            <input type="text" class="form-control" id="role-name" name="role_name">
                        </div>
                        <div class="form-group">
                            <label for="role-slug">Role Slug</label>
                            <input type="text" class="form-control" id="role-slug" name="role_slug" readonly>
                        </div>
                        <table class="table table-striped bordered " id="new-role-table">
                            <thead>
                                <tr>
                                    <td>Model</td>
                                    <td>Create</td>
                                    <td>View</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="models[]" id="" class="form-control">
                                            <option value="employee">Employee</option>
                                            <option value="user">User</option>
                                            <option value="branch">Branch</option>
                                            <option value="job">Job</option>
                                            <option value="role">Role</option>
                                            <option value="sms">SMS Notification</option>
                                            <option value="message">Message Templete</option>
                                            <option value="hr">HR Access</option>
                                            <option value="fam">FAM Access</option>
                                            <option value="vms">VMS Access</option>
                                            <option value="fcy">FCY Access</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label for="">
                                            <input type="checkbox" name="permissions[0][]" value="create">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label for="">
                                            <input type="checkbox" name="permissions[0][]" value="view">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox" >
                                            <label for="">
                                            <input type="checkbox" name="permissions[0][]" value="update">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label for="">
                                            <input type="checkbox" name="permissions[0][]" value="delete">
                                            </label>
                                        </div>
                                    </td>
                                   
                                </tr>
                            </tbody>
                        </table>
                       <div class="form-group">
                             <input type="submit" value="Save" class="btn btn-success">
                       </div>
                    </form>
                    <button class="btn btn-default pull-right" id="add-new-role-row">Add</button>
                </div>
                <div class="panel-footer">
                <div class="row">
                <div class="col-md-4">Maker <span class="label label-default">Default Label</span></div>
                <div class="col-md-4">Date Time <span class="label label-default">Default Label</span></div>
                <div class="col-md-4">Record Status <span class="label label-default">Default Label</span></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
