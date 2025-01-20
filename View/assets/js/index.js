 //Hero Animations

 document.addEventListener('DOMContentLoaded', () => {

    const heroImage= document.querySelector('.hero-img-transition')
    const heroContent =  document.querySelector('.hero-content-transition');

    setTimeout(()=>{
        heroImage.classList.remove('opacity-0');
        heroImage.classList.remove('translate-y-5');
        heroContent.classList.remove('opacity-0')
        heroContent.classList.remove('translate-y-5')

  }, 150)

   const sectionTitle = document.querySelectorAll(".section-title");


  const observer = new IntersectionObserver((entries) =>{
     entries.forEach((entry)=>{

         if(entry.isIntersecting){
               entry.target.classList.add("section-title-animation")
        
         }
     });
  },{
      threshold:0.2,
  });

   sectionTitle.forEach((el) => observer.observe(el));

});



  //course Animations
    const observerCourseCards = new IntersectionObserver((entries)=>{

           entries.forEach((entry) =>{
               if(entry.isIntersecting){
                   entry.target.classList.add("course-card-animation")
                   }

           })

    }, {
      threshold: 0.3
    });
     const cards  =document.querySelectorAll(".course-card");

      cards.forEach((card)=>observerCourseCards.observe(card));



     //Why us animation

 const  titleWhyChoose= document.querySelector(".why-choose-us-title")
  const observerWhyChoose = new IntersectionObserver((entries) =>{

       entries.forEach((entry) =>{
        if (entry.isIntersecting){
           titleWhyChoose.classList.add("transform")
           titleWhyChoose.classList.remove("opacity-0");
        }

      });

  },{
      threshold: 0.5,
  })

  observerWhyChoose.observe(titleWhyChoose)




      const item1 =document.querySelector(".why-choose-us-item1");
        const item2=document.querySelector(".why-choose-us-item2")
        const item3 = document.querySelector(".why-choose-us-item3")
        const  observeWhyItems =  new IntersectionObserver((entries) =>{
         entries.forEach((entry)=>{
        
                if (entry.isIntersecting){
                  entry.target.classList.remove('opacity-0');
           

               }

           })


         },{
              threshold: 0.3,
         })
          observeWhyItems.observe(item1);
          observeWhyItems.observe(item2);
         observeWhyItems.observe(item3)




  //Testimonial observer

  const testimonials = document.querySelectorAll(".testimonials-items");
  const observerTestimonials  =  new IntersectionObserver((entries)=>{
   
   entries.forEach((entry) =>{
        if (entry.isIntersecting){
          entry.target.classList.add("testimonials-transition")
      
        }


    })


  }, {threshold:0.2,});

    testimonials.forEach(el => observerTestimonials.observe(el));