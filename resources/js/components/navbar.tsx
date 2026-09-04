import { useState, useEffect } from "react";
import { Link } from "@inertiajs/react";


const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const[loading,setLoading] = useState(false);
  
  const toggleDropdown = () => setIsOpen(!isOpen);

  useEffect(()=>{
    setLoading(false)
  },[])

  return (
    <nav className="flex absolute top-0 w-full z-50 border-b border-gray-300 text-white ">
        <div className="container mx-auto">
            <div className="flex justify-between h-16 items-center">
                 <Link href="/" prefetch className="font-bold text-lg px-4">
                   {loading ? 
                       <div className="flex items-center flex-row gap-2">
                         <div className="h-7 w-7 bg-gray-600 animate-pulse rounded-full"></div>
                         <div className="h-8 w-1/2 bg-gray-300 rounded" />
                       </div>
                      :
                      <div className="flex items-center flex-row gap-2">
                         <img 
                         className="h-7 w-7 bg-none brightness-180 rounded-full" 
                         src="/vacatiologo.png"
                         onLoad={()=>setLoading(false)}
                         />
                         
                          <h1>Vacatio</h1>
                      </div>
                }
                  </Link>
                <div className="hidden md:flex gap-4">
                  <Link href="/" prefetch>Contact</Link>
                  <Link href="/" prefetch>Yebba</Link>
                </div>              
                <div className="hidden md:flex gap-3">
                     <button>
                        <p className="">Home</p>
                    </button>           
                    <Link href="/login" prefetch className="text-md hover:underline hover:text-blue-500">Login/Sign up</Link>                             
                </div>
                 <button
                        onClick={toggleDropdown}
                        className="md:hidden relative mr-5 mt-2 p-2 rounded-full hover:bg-gray-200"
                        aria-label="Toggle menu"
                      >
                       {isOpen ?<p>Exit</p> :<p>Enter</p>}
                  </button>

            </div>
          { isOpen && 
             <div className="md:hidden">
                <div className="flex flex-col flex-start space-y-4 w-full h-screen p-4">
                  <Link href="/user/register" prefetch className="text-md hover:underline hover:text-blue-500">Login/Sign up</Link>                               
                  <Link href="" prefetch>Contact</Link>
                  <Link href="" prefetch>Yebba</Link> 
                   <div className="flex flex-row gap-2">
                    <button>
                          <p>Profile</p>    
                      </button>  
                      <h1>Profile</h1>                    
                  </div>  
                  <div className="flex flex-row gap-2">
                    <button>
                        <p>Cart</p>   
                      </button>  
                      <h1>Orders</h1>                    
                  </div>                        
               </div>
             </div>
          }
        </div>    
    </nav>
  );
};

export default Navbar;