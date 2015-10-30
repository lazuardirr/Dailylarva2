@if ($errors->any())
    <div class="box-footer">
        <table class="alert alert-danger col-md-12">
            @foreach($errors->all() as $error)
                <tr>
                    <td class="text-center">{{ $error }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endif