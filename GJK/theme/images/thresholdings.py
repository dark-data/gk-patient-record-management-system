import matplotlib.pyplot as plt
import cv2

image = cv2.imread('logo.png',0)

ret,thresh_binary = cv2.threshold(image,127,255,cv2.THRESH_BINARY)
ret,thresh_binary_inv = cv2.threshold(image,127,255,cv2.THRESH_BINARY_INV)
ret,thresh_trunc = cv2.threshold(image,127,255,cv2.THRESH_TRUNC)

plt.subplot(111), plt.imshow(thresh_binary,'gray'),plt.title("binary thrsholding")
plt.show()

cv2.waitKey(0)
cv2.destroyAllWindows()

