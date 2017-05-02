{{ dump(LaraCart::get()->cart) }}

Total
{{ LaraCart::total() }}
<br><br>
<form action="/cart/add">
    <button>Add Random Item</button>
</form>

<form action="/cart/fee">
    <button>Add $5.00 Delivery Fee</button>
</form>

<form action="/cart/destroy">
    <button>Destroy</button>
</form>