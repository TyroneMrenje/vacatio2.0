import React from "react";
import { Link } from "@inertiajs/react";



export default function Footer(){
    return(
        <div className="flex relative bottom-0 bg-[#000521] text-white h-50 mt-30">
              <div className="container mx-auto">
                    <div className="flex justify-between h-16 items-center">
                        <Link href="/" prefetch className="font-bold text-lg px-4">
                        <div className="flex items-center flex-row gap-2">
                            <img className="h-7 w-7 bg-none brightness-180 rounded-full" src="/vacatiologo.png"/>
                            <h1>Vacatio</h1>
                        </div>
                        </Link>                 
                        <div className="hidden md:flex gap-4">
                            <Link href="/" prefetch>Contact</Link>
                            <Link href="/" prefetch>Yebba</Link>
                        </div>              
                        <div className="hidden md:flex gap-3">
                                <button>
                                <p className="">Home</p>
                            </button>           
                            <Link href="/" prefetch className="text-md hover:underline hover:text-blue-500">Login/Sign up</Link>                             
                        </div>
                    </div>
                </div>
        </div>
    )
}