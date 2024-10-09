function showNotification(message, type = 'success') {
    // Tạo phần tử thông báo
      const notification = document.createElement('div');
      notification.textContent = message;
  
      // Thiết lập kiểu dáng dựa trên loại thông báo
      let backgroundColor = '#4CAF50'; // Màu xanh lá cây cho thông báo thành công
      if (type === 'error') {
        backgroundColor = '#f44336'; // Màu đỏ cho thông báo lỗi
      } else if (type === 'warning') {
        backgroundColor = '#ff9800'; // Màu cam cho thông báo cảnh báo
      }
  
      notification.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: ${backgroundColor};
        color: white;
        padding: 50px 32px;
        font-size: 24px;
        border-radius: 30px;
        z-index: 1000;
      `;
      document.body.appendChild(notification);

      setTimeout(() => {
        notification.style.opacity = 0;
        setTimeout(() => {
          notification.remove();
        }, 500);
      }, 2000);
    }