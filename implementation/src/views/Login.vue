<template>
<div>
    <Nav/>
    <LoginCard/>
</div>
</template>

<style>

.centerContent{
    justify-content: center;
}

.box-width {
    width: 500px; 
}

.box {
    border-radius:10px;
    padding: 40px;
    padding-bottom: 10px;
    background: #191919;
    text-align: center;
    transition: 0.25s;
}

.box input[type="text"],
.box input[type="password"],
.box select {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    width: 200px;
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus, 
.box select:focus {
    border-color: #2ecc71;
    width: 250px;
}

.box button[type="button"]:active{
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
}

</style>

<script>
import Nav from '../components/Nav.vue'
import LoginCard from '../components/noUser/LoginCard.vue'

export default {
  components: { Nav, LoginCard }
    
}
</script>