@extends("layouts.app")
@section("content")
<script type="text/javascript">
	function disable_enable_input_inventory(input_disable,input_enable){
		document.querySelector(`input[name='${input_disable}']`).disabled=true;
		document.querySelector(`input[name='${input_enable}']`).disabled=false;
	}
</script>
<form method="post" action="{{route('inventaires.update',$inventory->id)}}">
	@csrf
	@method('PUT')
	<input id="poids" type="radio" name="type" value="weight" oninput="disable_enable_input_inventory('quantity','weight')" {{$inventory->weight? 'checked':''}}><label for="poids">Poids</label>
	<input id="quantity" type="radio" name="type" value="quantity" oninput="disable_enable_input_inventory('weight','quantity')" {{$inventory->quantity? 'checked':''}}><label for="quantity">Quantité</label><br>
	<label>Poids:</label>
	<input type="text" name="weight" value="{{$inventory->weight?$inventory->weight:''}}" {{$inventory->weight?'':'disabled'}}>
	<label>Quantity:</label>
	<input type="text" name="quantity" value="{{$inventory->quantity?$inventory->quantity:''}}"  {{$inventory->quantity?'':'disabled'}}>
	<br>
	<input type="submit">
</form>
@endsection