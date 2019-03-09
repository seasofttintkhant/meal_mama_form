<template>
  <div>
    <gmap-map ref="mapRef" 
      :center="center"
      :zoom="16"
      @place_changed="setPlace"
      style="width:100%;  height: 300px;"
      :options="{scrollwheel: false}">
      <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        @click="center=m.position"
        :draggable="true" 
        @drag="setPlace" 
      ></gmap-marker>
    </gmap-map>
  </div>
</template>

<script>
export default {
  name: "GoogleMap",
  props: [ 'lat', 'lng'],
  data() {
    return {
      center: { 
        lat: parseFloat(this.lat), 
        lng: parseFloat(this.lng) 
        },
      markers: [],
      places: [],
      currentPlace: null,
      coordinates: null,
    };
  },

  created() {
    this.markers.push({ position: this.center });   
    
  },
  methods: {
    setPlace(place) {
      this.currentPlace = place
      this.center={ 
          lat: this.currentPlace.latLng.lat(), 
          lng: this.currentPlace.latLng.lng()
        }  

      this.$parent.$emit('locationSet', this.center);
    },
    setMarker(lat,lng){
       this.markers = [];
       this.center={ 
          lat: parseFloat(lat),
          lng: parseFloat(lng),
        }  
        this.geocodeLatLng()

    },
    geocodeLatLng() {
        var geocoder = new google.maps.Geocoder;
        var latlng =this.center;
        var vm = this;

        geocoder.geocode({'location': latlng}, function(results, status){
          if (status === 'OK') {
            if (results[0]) {
                vm.markers.push({ position: vm.center });  
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
  }
};
</script>