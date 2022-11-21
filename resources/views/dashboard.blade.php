<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('success_msg'))
                    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                        <strong>Message!</strong> {{ Session('success_msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-weight: 900;font-size: 20px;">X</button>
                    </div>
                    @endif
                    @if (Session::has('warning_msg'))
                    <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                        <strong>Message!</strong> {{ Session('warning_msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-weight: 900;font-size: 20px;">X</button>
                    </div>
                    @endif

                    <div class="mb-3 float-end">
                        <a href="{{ url('add-edit-member') }}" class="btn btn-success"> Add Member </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-new">

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Id:</th>
                                    <th>Name:</th>
                                    <th>Address:</th>
                                    <th>Image:</th>
                                    <th>Action:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $member['name'] }}</td>
                                        <td>{{ $member['address'] }}</td>
                                        <td>
                                            @if ($member['image'] != '')
                                            <img style="height: 50px" src="{{ url('images/member_image/'.$member['image']) }}" alt="{{ $member['image'] }}">
                                            @else
                                            <img style="height: 50px" src="{{ url('images/member_image/no_img.png') }}" alt="no_img.png">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('add-edit-member/' . $member['id']) }}" class="text-primary"
                                                title="Edit Member">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ url('delete-member/' . $member['id']) }}" class="text-danger ms-3" title="Delete Member"
                                                onclick="return confirm('Do you want to delete this?')">
                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
