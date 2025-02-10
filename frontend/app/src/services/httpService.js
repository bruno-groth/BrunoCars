import axios from 'axios';
const API_URL = "http://localhost:8000";

const api = axios.create({
  baseURL: API_URL + '/api'
});

export const fetchVehicles = async () => {
  const response = await api.get('/pesquisa');
  return response.data;
};