<script setup>
const props = defineProps({
  vehicle: {
    type: Object,
    required: true
  }
});
</script>

<template>
  <b-card class="h-100">
    <b-card-title>{{ vehicle.nome }}</b-card-title>
    <b-card-text>
      <span class="badge bg-primary">{{ vehicle.categoria }}</span>
    </b-card-text>
    <template #footer>
      <div class="d-flex justify-content-end">
        <h4 class="text-success mb-0">R$ {{ vehicle.preco }}/dia</h4>
      </div>
    </template>
  </b-card>
</template>