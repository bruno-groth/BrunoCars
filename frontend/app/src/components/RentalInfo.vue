<script setup>
const props = defineProps({
  rental: {
    type: Object,
    required: true
  }
});
</script>

<template>
  <b-card class="mb-4">
    <h2 class="display-4">{{ rental.name }}</h2>
    <p class="lead">
      <i class="bi bi-geo-alt"></i> {{ rental.address }}
    </p>
    <p class="lead">
      <i class="bi bi-telephone"></i> {{ rental.phone }}
    </p>
  </b-card>
</template>