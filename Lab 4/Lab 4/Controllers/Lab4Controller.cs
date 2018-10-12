using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using WaffleGenerator;
using Microsoft.AspNetCore.Html;

namespace Lab_4.Controllers
{
    public class Lab4Controller : Controller
    {
        private static List<HtmlString> waffles = new List<HtmlString>();

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


        public IActionResult Waffler(int id)
        {
            waffles.Clear();

            for (int i = 0; i < id; i++)
            {
                var waffle = WaffleEngine.Html(2, true, false);
                ViewBag.Waffle = new HtmlString(waffle);
                waffles.Add(ViewBag.Waffle);
            }

            return View(waffles);
        }

    }
}