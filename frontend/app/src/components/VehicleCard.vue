<script setup>
const props = defineProps({
  vehicle: {
    type: Object,
    required: true
  }
});

const formatPrice = (price) => {
  return new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL'
  }).format(price);
};

const onReserve = (vehicle) => {
  console.log('Realizar reserva!!', vehicle)
}
</script>

<template>
  <b-card class="h-100 vehicle-card" no-body>
    <div class="vehicle-img-placeholder bg-light p-4 text-center">
      <i class="bi bi-car-front display-1 text-primary"></i>
    </div>
    
    <b-card-body>
      <b-card-title class="h5 mb-3">{{ vehicle.nome }}</b-card-title>
      
      <div class="mb-3">
        <b-badge 
          variant="primary" 
          class="category-badge">
          <i class="bi bi-tag me-1"></i>
          {{ vehicle.categoria }}
        </b-badge>
      </div>

      <div class="price-section">
        <small class="text-muted">Diária a partir de</small>
        <div class="h4 mb-0 text-success">
          {{ formatPrice(vehicle.preco) }}
        </div>
      </div>
    </b-card-body>

    <b-card-footer class="bg-light">
      <b-button variant="primary" block @click="onReserve">
        <i class="bi bi-calendar-check me-2"></i>
        Reservar Agora
      </b-button>
    </b-card-footer>
  </b-card>
</template>

<style scoped>
.vehicle-card {
  transition: transform 0.2s, box-shadow 0.2s;
}

.vehicle-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.vehicle-img-placeholder {
  height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid rgba(0,0,0,0.1);
}

.category-badge {
  font-size: 0.9rem;
  padding: 0.5rem 1rem;
}

.price-section {
  margin-top: 1rem;
  padding-top: 1rem;
  border-top: 1px solid rgba(0,0,0,0.1);
}

.bi {
  vertical-align: -0.125em;
}
</style>