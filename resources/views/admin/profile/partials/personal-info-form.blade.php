<!-- resources/views/admin/profile/partials/personal-info-form.blade.php -->
<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
</form>
