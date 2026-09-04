import { Head, Link } from "@inertiajs/react";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";

export default function Home(){
    return(
        <div className="border-box overflow-hidden scroll-smooth">
         <Head title="Home Sweet Home"/>
         <Navbar/> 
         <img src={`/storage/hotel/hotel_coverpage.jpg`} className="flex h-screen w-full aspect-square md:aspect-auto object-cover -z-10 brightness-65"/> 
         <div className="flex absolute items-center justify-center w-full h-screen top-0">
             <h1 className="text-leading text-4xl md:text-6xl font-bold z-10 text-white">Blue Waves Of Serenade</h1>                                          
         </div>     
         <div className="flex flex-row justify-center relative m-10 h-70 w-[80%]"> 
            <div className="text-pretty text-leading w-[600px] m-10">
                 <p className="font-medium text-md">Experience exceptional hospitality with Vacatio, where every stay is designed to inspire comfort, relaxation, and unforgettable memories. From elegant accommodations and curated experiences to world-class amenities and event spaces, discover destinations that make every journey truly special.</p>
            </div>
            <div className="flex flex-col border-l border-gray-700">
               <div className="space-y-4 px-4">
                    <div className="flex items-center flex-row gap-2">
                        <img className="h-8 w-8 bg-none brightness-180 rounded-full" src="/vacatiologo.png"/>
                        <h1>Vacatio</h1>
                    </div>
                    <p>vacatio@gmail.com</p>
                    <p>+254792781167</p>
                    <p>Diani, Kenya</p>
              </div>
          </div>
        </div>

        <div className="flex relative items-center justify-center h-150 px-10">
            <div className="h-full w-full">
                <img src={`/storage/hotel/hotelroombg-overview.png`} className="h-full w-full aspect-square md:aspect-auto object-cover -z-10 brightness-65 rounded-lg"/>
            </div>
            <div className="flex flex-col absolute items-center gap-2">
                <h1 className="text-leading md:text-5xl text-4xl font-bold z-10 text-white">Look at our rooms.You know you want to</h1>  
                <Link 
                    href="/rooms" 
                    prefetch
                    className="inline-block border p-4 text-white hover:bg-white hover:text-black transition-colors"
                >
                Press Me
            </Link>   
            </div>
            <div className="flex absolute bottom-20">
                 <button className="animate-bounce text-white mt-40 p-4 hover:rounded-full hover:bg-gray-100/20">D</button>                                         
            </div>
      </div>

       <div className="flex relative flex-col items-center my-15">
         <h1 className="text-leading md:text-6xl text-4xl font-bold z-10 text-[#000521]">Spa Services</h1>
         <div className="text-balanced w-[50%] m-5">
              <p className="font-medium text-md">Experience exceptional hospitality with Vacatio, where every stay is designed to inspire comfort, relaxation, and unforgettable memories. From elegant accommodations and curated experiences to world-class amenities and event spaces, discover destinations that make every journey truly special.This is a placeholder for spa.</p>
         </div>
         <div className="grid grid-cols-3 px-10" >
                <div className="m-2 z-0">
                    <img className="h-full aspect-square md:aspect-auto object-cover rounded-lg" src={`/storage/spa/spacoverpage.webp`}/>
                </div>
                <div className="z-50">
                    <img className="h-full aspect-square md:aspect-auto object-cover z-10 rounded-lg" src={`/storage/spa/spa_people.png`}/>
                </div>
                <div className="m-2 z-0">
                    <img className="h-full aspect-square md:aspect-auto object-cover -z-10 rounded-lg" src={`/storage/spa/spa_lotions.jpeg`}/>
                </div>
          </div>
        </div> 

        <div className="flex flex-col relative px-10">
            <h1 className="text-leading md:text-5xl text-4xl font-bold text-[#000521]">Events & Meetings</h1>
            <div className="flex flex-row justify-center relative"> 
                <div className="text-pretty font-medium">
                   <p className="font-medium text-md mt-10">Experience exceptional hospitality with Vacatio, where every stay is designed to inspire comfort, relaxation, and unforgettable memories. From elegant accommodations and curated experiences to world-class amenities and event spaces, discover destinations that make every journey truly special.This is a placeholder for events.</p>
                </div>
            <div className="grid grid-cols-2">
                <div className="m-2"> 
                    <img src={`/storage/event/garden/garden_venue.jpeg`} className="h-full aspect-square md:aspect-auto object-cover -z-10 rounded-lg" />
                </div>
                <div className="m-2">
                    <img src={`/storage/event/office/office.jpeg`} className="h-full aspect-square md:aspect-auto object-cover -z-10 rounded-lg" />
                </div>
                <div className="m-2">
                    <img src={`/storage/event/hall/corporatehaal.jpg`} className="h-full aspect-square md:aspect-auto object-cover -z-10 rounded-lg"  />
                </div>
            </div>
         </div>
        </div>   
        <div className="flex items-center justify-center m-10">
            <button className="animate-shine bg-[#000521] text-white font-thin p-4">GET 15% OFF WITH YOUR FIRST BOOKING</button>
        </div>  
        <Footer/>  
    </div>
        
    )
}