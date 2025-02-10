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
    error.value = 'Failed to load vehicles';
  } finally {
    loading.value = false;
  }
});
</script>

<template>
<div>
  <b-container class="">
    <div v-if="loading" class="text-center">
      <b-spinner label="Loading..."></b-spinner>
    </div>
    
    <div v-else-if="error" class="alert alert-danger">
      {{ error }}
    </div>
    
    <template v-else>
      <RentalInfo :rental="rentalData.rental" />
      
      <b-row>
        <b-col v-for="vehicle in rentalData.vehicles" 
               :key="vehicle.nome" 
               cols="12" md="6" lg="4" 
               class="mb-4">
          <VehicleCard :vehicle="vehicle" />
        </b-col>
      </b-row>
    </template>
  </b-container>
  </div>
</template>