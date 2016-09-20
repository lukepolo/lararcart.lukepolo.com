{{ dump(LaraCart::get()->cart) }}

Total
{{ LaraCart::total() }}
<br><br>
<form action="/cart" METHOD="post">
    {!! csrf_field() !!}
    <button>Add Item</button>
</form>

<form action="/cart/fee" METHOD="post">
    {!! csrf_field() !!}
    <button>Add $5.00 Delivery Fee</button>
</form>