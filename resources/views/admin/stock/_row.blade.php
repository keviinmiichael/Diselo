<tr>
    <td>
        <label class="input"><input name="code[]" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="name[]" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="cost[]" type="text" value="" class="cost" data-type="float" /></label>
    </td>
    <td>
        <label class="input"><input name="size_id_1[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <label class="input"><input name="size_id_2[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <label class="input"><input name="size_id_3[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <label class="input"><input name="size_id_4[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <label class="input"><input name="size_id_5[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <label class="input"><input name="size_id_6[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <label class="select">
            {!! \App\Color::toSelect() !!}
            <i></i>
        </label>
    </td>
    <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="Stock.removeRow(this)"><i class="fa fa-trash-o"></i></a></td>
</tr>