<script setup>
const props = defineProps({
  rental: {
    type: Object,
    required: true
  }
});
</script>

<template>
  <b-card class="mb-4 rental-info" no-body>
    <b-card-header class="bg-primary text-white">
      <h2 class="mb-0">
        <i class="bi bi-building me-2"></i>
        {{ rental.name }}
      </h2>
    </b-card-header>
    <b-card-body>
      <b-row>
        <b-col md="6">
          <p class="mb-2">
            <i class="bi bi-geo-alt me-2"></i>
            <strong>Endereço:</strong> {{ rental.address }}
          </p>
        </b-col>
        <b-col md="6">
          <p class="mb-2">
            <i class="bi bi-telephone me-2"></i>
            <strong>Telefone:</strong> {{ rental.phone }}
          </p>
        </b-col>
      </b-row>
    </b-card-body>
  </b-card>
</template>

<style scoped>
.rental-info {
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.bi {
  vertical-align: -0.125em;
}
</style>