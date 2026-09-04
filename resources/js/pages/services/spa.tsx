import React from "react";
import { Head, Link } from "@inertiajs/react";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";
import { SpaCoverPage, SpaServiceMenu } from "@/types/spa";
import { useState } from "react";

interface Props{
    spacoverpage:SpaCoverPage,
    treatments:SpaServiceMenu[],
    bodyceremonies:SpaServiceMenu[],
    facialtreatments:SpaServiceMenu[]
    
}



export default function SpaPage({spacoverpage, treatments, bodyceremonies, facialtreatments}: Props){

    const[IsMenuOpen, SetIsMenuOpen]= useState(false);

    

    const toggleMenu = () => SetIsMenuOpen(!IsMenuOpen);

       return(
        <div className="box-border overflow-hidden scroll-smooth">
            <Head title="Yebba's Heartbreak"/>
            <Navbar/>
            <div className="flex relative h-screen w-full items-center justify-center">
                <div className="h-full w-full">
                     <img src={`/storage/${spacoverpage.image_path}`} className="h-screen w-full aspect-square md:aspect-auto object-cover object-center -z-10 brightness-70"/>        
                </div>            
                <div className="flex flex-col absolute items-center w-full">
                    <h1 className="text-white text-6xl font-thin">Vacatio {spacoverpage.name} </h1>     
                </div>    
           </div>
            {IsMenuOpen &&  
              <div className="flex w-full h-full items-center justify-center">
                 <div className="flex flex-col absolute scrollbar-thin overflow-auto bg-white border-2 border-gray-700 rounded-lg z-10  h-150 w-250 items-center justify-center">  
                 <button className="size-min  bg-[#000521] text-white font-normal p-4 hover:cursor-pointer"
                 onClick={toggleMenu}
                 >SEE MENU PRICES
                 </button>          
                    <div className="flex flex-col m-5">
                        <div className="flex items-center justify-center mb-10">
                            <h1 className="text-4xl font-medium">TREATMENTS</h1>
                        </div>
                        <div className="grid grid-cols-2">
                            {treatments.map((treatment)=>(
                                <div className="flex flex-col text-left p-4" key={treatment.id}>
                                <div className="flex flex-row justify-between w-full">
                                    <p>{treatment.name}</p>
                                    <p>Kshs {treatment.price}</p>
                                </div>
                                <p className="text-sm my-4 ">{treatment.description}</p>
                                </div>
                            ))}
                        </div>
                    </div>

                    <div className="flex flex-col m-5">
                        <div className="flex items-center justify-center mb-10">
                            <h1 className="text-4xl font-medium">VACATIO BODY CEREMONIES</h1>
                        </div>
                        <div className="grid grid-cols-2">
                        {bodyceremonies.map((treatment)=>(
                            <div className="flex flex-col text-left p-4" key={treatment.id}>
                            <div className="flex flex-row justify-between w-full">
                                <p>{treatment.name}</p>
                                <p>Kshs {treatment.price}</p>
                            </div>
                            <p className="text-sm my-4">{treatment.description}</p>
                            </div>
                            ))}
                        </div>
                    </div>

                    <div className="flex flex-col m-5">
                         <div className="flex items-center justify-center mb-10">
                            <h1 className="text-4xl font-medium">FACIAL TREATMENTS</h1>
                        </div>
                        <div className="grid grid-cols-2">
                            {facialtreatments.map((treatment)=>(
                                <div className="flex flex-col text-left p-4" key={treatment.id}>
                                <div className="flex flex-row justify-between w-full">
                                    <p>{treatment.name}</p>
                                    <p>Kshs {treatment.price}</p>
                                </div> 
                                <p className="text-sm my-4 text-pretty">{treatment.description}</p>
                                </div>
                            ))}
                        </div>
                    </div>
               </div>      
              </div> 
            }
            
           <div className="flex relative m-20">
                <p>{spacoverpage.description}</p>
            </div>
        
            <div className="flex flex-row items-center justify-center relative m-10 h-70"> 
               <div className="flex flex-col border-r border-gray-700">
                    <div className="space-y-4 px-4">
                        <div className="flex items-center flex-row gap-2">
                            <img className="h-7 w-7 bg-none brightness-180 rounded-full" src="/vacatiologo.png"/>
                            <h1>Vacatio</h1>
                        </div>
                        <p>vacatiospa@gmail.com</p>
                        <p>Appointment Time: 0900Hrs - 16:00Hrs</p>
                        <p>Diani, Kenya</p>
                        <p className="text-sm">Card rates may be subject to change</p>
                    </div>
              </div>
             <div className="flex items-center justify-center m-10">
                 <button className="animate-shine bg-[#000521] text-white font-normal p-4 hover:cursor-pointer"
                 onClick={toggleMenu}
                 >SEE MENU PRICES</button>
            </div>  
          </div> 
          <Footer/>
    </div>
    )
}