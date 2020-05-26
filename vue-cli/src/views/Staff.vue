<template>
    <div>
        <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">Applicants</a></li>
  <li><a href="#contact">Wave</a></li>
  <li><a href="#about">Interview Jury</a></li>
  <li><a href="#about">Account</a></li>
</ul>
    </div>
</template>
<style scoped>
ul {
    font-family: Tahoma;
    font-size: 1.2rem;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(190, 190, 190);
  width: 100vw
}

li {
  float: left;
  width: 20%;
}

li a {
  display: block;
  color: rgb(80, 80, 80);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
  color: white;
}

.active {
  background-color: rgb(255, 255, 255);
  color: black
}
</style>