<template>
	<div>
		<div class="alert alert-success" v-if="saved">
			<strong>Success!</strong> Your pedido has been saved successfully.
		</div>

		<div class="well well-sm" id="pedido-form">
			<form class="form-horizontal" method="post" @submit.prevent="onSubmit">
				<div class="form-group">
					<label>Id de Persona</label>
					<input type="number" v-model="pedido.persona_id" class="form-control input-sm" placeholder="Id de la Persona">
				</div>
				<div class="form-group">
					<label>Id de Vianda</label>
					<input type="number" v-model="pedido.vianda_id" class="form-control input-sm" placeholder="Id de la Vianda">
				</div>
				<div class="form-group">
					<label>Fecha de Solicitud</label>
					<input type="text" v-model="pedido.fecha_solicitud" class="form-control input-sm" placeholder="dd/mm/aaaa">
				</div>
				<div class="form-group">
					<label>Fecha de Entrega</label>
					<input type="text" v-model="pedido.fecha_entrega" class="form-control input-sm" placeholder="dd/mm/aaaa">
				</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</template>

<script>
export default {

	data() {
		return {
			errors: [],
			saved: false,
			pedido: {
				persona_id: null,
				vianda_id: null,
				fecha_solicitud: null,
				fecha_entrega: null
			}
		};
	},

	methods: {
		onSubmit() {
			this.saved = false;

			axios.post('api/pedidos', this.pedido)
			.then(({data}) => this.setSuccessMessage())
			.catch(({response}) => this.setErrors(response));
		},

		setErrors(response) {
			this.errors = response.data.errors;
		},

		setSuccessMessage() {
			this.reset();
			this.saved = true;
		},

		reset() {
			this.errors = [];
			this.pedido = {persona_id: null, vianda_id: null, fecha_solicitud: null, fecha_entrega: null};
		}
	}
}
</script>
