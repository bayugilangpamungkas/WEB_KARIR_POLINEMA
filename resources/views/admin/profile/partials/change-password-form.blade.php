<!-- resources/views/admin/profile/partials/change-password-form.blade.php -->
<form action="{{ route('profile.changePassword') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="current_password" class="form-label">Password Lama</label>
        <input type="password" class="form-control" id="current_password" name="current_password">
    </div>
    <div class="mb-3">
        <label for="new_password" class="form-label">Password Baru</label>
        <input type="password" class="form-control" id="new_password" name="new_password">
    </div>
    <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Change Password</button>
    </div>
</form>
