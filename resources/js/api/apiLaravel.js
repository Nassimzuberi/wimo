import * as axios from 'axios';

const apiLaravel = axios.create({
    baseURL : '/api/',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
})

export default apiLaravel;
