<div class="groupData" id="buyerData">
	
	<h1>Dados do comprador</h1>
	
	<div class="field">
		<label for="senderEmail">E-mail</label>
		<input type="text" name="senderEmail" id="senderEmail" />
	</div>
	
	<div class="field">
		<label for="senderName">Nome completo</label>
		<input type="text" name="senderName" id="senderName" holderField="name" />
	</div>
	
	<div class="field">
		<label for="senderCPF">CPF (somente números)</label>
		<input type="text" name="senderCPF" id="senderCPF" holderField="cpf" maxlength="11" />
	</div>
	
	<div class="field">
		<label for="senderAreaCode">Telefone</label>
		<input type="text" name="senderAreaCode" id="senderAreaCode" holderField="areaCode" class="areaCode" maxlength="2" />
		<input type="text" name="senderPhone" id="senderPhone" holderField="phone" class="phone" maxlength="9" />
	</div>
	
	<h2>Endere&ccedil;o de Residencial</h2>
	
	<div class="field">
		<label for="shippingAddressPostalCode">CEP (somente números)</label>
		<input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" holderField="postalCode" maxlength="8" />
	</div>
	
	<div class="field">
		<label for="shippingAddressStreet">Rua, Avenida, etc ...</label>
		<input type="text" name="shippingAddressStreet" id="shippingAddressStreet" holderField="street" />
	</div>
	
	<div class="field">
		<label for="shippingAddressNumber">N&uacute;mero</label>
		<input type="text" name="shippingAddressNumber" id="shippingAddressNumber" holderField="number" />
	</div>
	
	<div class="field">
		<label for="shippingAddressComplement">Complemento</label>
		<input type="text" name="shippingAddressComplement" id="shippingAddressComplement" holderField="complement" />
	</div>
	
	<div class="field">
		<label for="shippingAddressDistrict">Bairro</label>
		<input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" holderField="district" />
	</div>
	
	<div class="field">
		<label for="shippingAddressCity">Cidade</label>
		<input type="text" name="shippingAddressCity" id="shippingAddressCity" holderField="city" />
	</div>
	
	<div class="field">
		<label for="shippingAddressState">Estado</label>
		<input type="text" name="shippingAddressState" id="shippingAddressState" holderField="state" class="addressState" maxlength="2" />
	</div>
	
	<div class="field">
		<label for="shippingAddressCountry">Pa&iacute;s</label>
		<input type="text" name="shippingAddressCountry" id="shippingAddressCountry" holderField="country" value="Brasil" />
	</div>
	
</div>
