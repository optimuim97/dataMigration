<template>
    <div class="loading "  :class="isDisplay == false ? 'hide' : 'show'" >
      <img src="../../styles/img/spinner-primary.svg" alt="loader" />
    </div>
  </template>
  
  <script>

  export default {
      name : 'LoadingComponent',
      props : ["isDisplay"]
  };
  </script>
  
  <style lang="css" scoped>
  .loading{
    display: flex;
    height: 100%;
    justify-content: center;
  }
  .loading img{
    height: 50px;
  }
  .hide{
      display:none;
  }
  .show{
      display: block;
  }
  </style>