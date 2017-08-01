<tr>
    <td>
        <label class="input"><input name="code" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="name" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input class="cost" name="cost" type="text" value="" data-type="float" /></label>
    </td>
    <td>
        <label class="select">
            <select name="size_id" style="padding: 5px 20px">
                <option value="1">XS</option>
                <option value="2">S</option>
                <option value="3">M</option>
                <option value="4">L</option>
                <option value="5">XL</option>
            </select>
            <i></i>
        </label>
    </td>
    <td>
        <label class="input"><input class="stock" name="amount" type="text" value="" data-type="int" /></label>
        <input type="hidden" name="product_id" value="0" />
    </td>
    <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="removeItem(this)"><i class="fa fa-trash-o"></i></a></td>
</tr>