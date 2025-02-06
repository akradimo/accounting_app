/** @type {import('tailwindcss').Config} */  
module.exports = {  
    // حالت "جایگزین" و "مناسب" برای مدرن‌ترین CSS  
    content: [  
      './src/**/*.{html,js}',  // مسیر فایل‌ها را مشخص کنید  
      './public/**/*.{html,js}'  
    ],  
    theme: {  
      extend: {  
        colors: {  
          primary: '#1DA1F2',  // رنگ اصلی  
          secondary: '#14171A', // رنگ ثانویه  
        },  
        spacing: {  
          '128': '32rem',  // اضافه کردن مقدار جدید برای فاصله  
          '144': '36rem',  
        },  
        // سایر تنظیمات دلخواه...  
      },  
    },  
    plugins: [],  
  }