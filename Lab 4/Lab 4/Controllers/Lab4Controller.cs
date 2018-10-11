using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;

namespace Lab_4.Controllers
{
    public class Lab4Controller : Controller
    {
        public IActionResult Index()
        {
       
            DateTime date = DateTime.Now;
            DateTime endDate = new DateTime(2019, 1, 1);
            TimeSpan span = endDate.Subtract(date);
            ViewBag.DaysLeft = span.Days;

            ViewBag.Greeting = "";

            if (DateTime.Now.Hour < 12)
            {
                ViewBag.Greeting = "Good Morning";
            }
            else if (DateTime.Now.Hour < 18)
            {
                ViewBag.Greeting = "Good Afternoon";
            }
            else
            {
                ViewBag.Greeting = "Good Evening";
            }

            return View(date);
        }
    }
}