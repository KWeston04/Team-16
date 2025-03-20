    const orders = [
      {
        date: "20/03/2025",
        total: "£59.99",
        status: "Processing",
        image: "wind_breaker.png",
        itemName: "Wind Breaker Jacket",
        isDelivered: false
      },
      {
        date: "19/11/2024",
        total: "£59.99",
        status: "Delivered",
        deliveredDate: "21/11/2024",
        image: "wind_breaker.png",
        itemName: "Wind Breaker Jacket",
        isDelivered: true
      }
    ];

    function showSection(sectionId) {
      document.querySelectorAll('.active-order').forEach(section => {
        section.classList.remove('active');
      });
      document.querySelectorAll('.button').forEach(button => {
        button.classList.remove('active');
      });
      document.getElementById(sectionId).classList.add('active');
      document.querySelector(`[onclick="showSection('${sectionId}')"]`).classList.add('active');
    }

    function displayOrders() {
      const currentOrdersContainer = document.getElementById('current-orders');
      const previousOrdersContainer = document.getElementById('previous-orders');
      
      currentOrdersContainer.innerHTML = '';
      previousOrdersContainer.innerHTML = '';
      
      orders.forEach(order => {
        const orderElement = createOrderElement(order);
        
        if (order.isDelivered) {
          previousOrdersContainer.appendChild(orderElement);
        } else {
          currentOrdersContainer.appendChild(orderElement);
        }
      });
      
      if (currentOrdersContainer.children.length === 0) {
        currentOrdersContainer.innerHTML = '<p class="no-orders">No current orders found.</p>';
      }
      
      if (previousOrdersContainer.children.length === 0) {
        previousOrdersContainer.innerHTML = '<p class="no-orders">No previous orders found.</p>';
      }
    }

    function getCurrentDate() {
      const today = new Date();
      const dd = String(today.getDate()).padStart(2, '0');
      const mm = String(today.getMonth() + 1).padStart(2, '0');
      const yyyy = today.getFullYear();
      return dd + '/' + mm + '/' + yyyy;
    }

  


  