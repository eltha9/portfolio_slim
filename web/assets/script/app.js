let tchat = ()=>{
    fetch(`${window.location}chat`)
    .then((response)=>{
    
        return response.json()
    })
    .then((_response)=>{
    
        console.log(_response)
    })

}


window.addEventListener('load', ()=>{

    tchat()
    setInterval(tchat, 2000)
})

