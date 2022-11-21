<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3 float-end">
                        <a href="{{ url('dashboard') }}" class="btn btn-success"> Back </a>
                    </div>
                    <div class="clearfix"></div>
                    <h3 class="members_heading">{{ $title }} member</h3>
                    <hr class="mb-3">
                    <form
                        action="{{ isset($members['id']) && !empty($members['id']) ? url('add-edit-member/' . $members['id']) : url('add-edit-member') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                                name="name" value="{{ isset($members['id']) ? $members['name'] : old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}*</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter Your Address"
                                name="address"
                                value="{{ isset($members['id']) ? $members['address'] : old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}*</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if (isset($members['id']))
                                <div class="mt-2">
                                    @if ($members['image'] != '')
                                    <a href="{{ url('images/member_image/' . $members['image']) }}" class="text-danger"
                                    target="_blank">View Image</a>
                                    @else
                                    <a href="{{ url('images/member_image/no_img.png') }}" class="text-danger"
                                    target="_blank">View Image</a>
                                    @endif
                                </div>

                            @endif
                        </div>

                        <button class="btn btn-primary mt-3 w-100"> {{ $title }} member </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
