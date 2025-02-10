<script setup>
import { ref, onMounted } from 'vue';
import { fetchVehicles } from '@/services/httpService';
import RentalInfo from '@/components/RentalInfo.vue';
import VehicleCard from '@/components/VehicleCard.vue';

const rentalData = ref(null);
const loading = ref(true);
const error = ref(null);

onMounted(async () => {
  try {
    const response = await fetchVehicles();
    rentalData.value = response.data[0];
  } catch (e) {
    error.value = 'Erro ao carregar os veículos. Por favor, tente novamente.';
  } finally {
    loading.value = false;
  }
});
</script>

<template>
  <div class="bg-light min-vh-100">
    <b-navbar variant="dark" type="dark" class="bg-primary mb-4 ">
      <b-navbar-brand class="ms-3 text-white">
        <i class="bi bi-car-front me-2"></i>
        BrunoCars Sistema de Locação de Veículos 
      </b-navbar-brand>
    </b-navbar>

    <b-container>
      <!-- Carregando -->
      <div v-if="loading" class="text-center py-5">
        <b-spinner variant="primary" label="Carregando..."></b-spinner>
        <p class="mt-3 text-muted">Carregando veículos disponíveis...</p>
      </div>

      <b-alert v-else-if="error" show variant="danger" class="mt-3">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ error }}
      </b-alert>

      <template v-else>
        <RentalInfo :rental="rentalData.rental" />

        <h3 class="mb-4">
          <i class="bi bi-car-front me-2"></i>
          Veículos Disponíveis
        </h3>

        <b-row>
          <b-col v-for="vehicle in rentalData.vehicles" 
                 :key="vehicle.nome" 
                 cols="12" md="6" lg="4" 
                 class="mb-4">
            <VehicleCard :vehicle="vehicle" />
          </b-col>
        </b-row>

        <b-alert v-if="!rentalData.vehicles.length" 
                 show 
                 variant="info">
          Nenhum veículo disponível no momento.
        </b-alert>
      </template>
    </b-container>

    <!-- Footer. TODO: Deixar fixo na parte de baixo do site -->
    <footer class="bg-dark text-light py-4 mt-5">
      <b-container class="text-center">
        <p class="mb-0">&copy; {{ new Date().getFullYear() }} BrunoCars Sistema de Locação de Veículos</p>
      </b-container>
    </footer>
  </div>
</template>

<style scoped>
.navbar-brand {
  font-size: 1.5rem;
}

.bi {
  vertical-align: -0.125em;
}
</style>