const contactForm = document.getElementById('contactForm');

contactForm.addEventListener('submit', (event) => { 
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phoneNumber = document.getElementById('phoneNumber').value;
    const checkin = document.getElementById('checkin').value;
    const t = document.getElementById('t').value;
    const tourPackage = document.getElementById('tourPackage').value;
        

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('phoneNumber', phoneNumber);
    formData.append('checkin',checkin );
    formData.append('t',t );
    formData.append('tourPackage',tourPackage);

    fetch('process_form.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Thank you for booking your tour package with us. We have received your booking request. WE WILL CONTACT YOU FOR FUTHER PROCESS!!');
            contactForm.reset();
        } else {
            alert('There was an error sending your message.');
        }
    });
});

const tourPackages = {
    1: {
        name: "HYDERABAD",
        price: 2500
    },
    2: {
        name: "DELHI",
        price: 2000
    },
    3: {
        name: "MUMBAI",
        price: 1500
    },
    4: {
          name:"BANGLORE",
          price: 3000
    },
    5: {
        name: "Kolkata",
        price: 5000
    }
};
const bookingForm = document.getElementById("contactForm");
const tourPackageSelect = document.getElementById("tourPackage");
const bookingSummaryElement = document.getElementById("bookingSummary");

tourPackageSelect.addEventListener("change", updateBookingSummary);

function updateBookingSummary() {
    const selectedTourPackageId = parseInt(tourPackageSelect.value);
    if (!selectedTourPackageId) {
        bookingSummaryElement.textContent = "";
        return;
    }

    const selectedTourPackage = tourPackages[selectedTourPackageId];
    const bookingSummary = `
        <p>Selected Tour Package: ${selectedTourPackage.name}</p>
        <p>Total Price: Rs.${selectedTourPackage.price}</p>
    `;

    bookingSummaryElement.innerHTML = bookingSummary;
}

