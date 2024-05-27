### 1. Override some existing method for any pimcore model with additional logic.
### 3. Create implementation for override some existing service (pseudo code)

From my point of view, these tasks are very similar.
So I decided to do them for one class.
For this purpose, I used the decorator pattern.

https://pimcore.com/docs/platform/2023.2/Pimcore/Extending_Pimcore/Overriding_Models/
https://github.com/IgorPr/test-task/blob/6feaf1cfd3c83105dac339a4eb46e1230609d5db/src/Model/DataObject/DebugService.php


### 2. Create custom model (not pimcore class, DAO approach) to be able to work with table Filters.
   Table Filters structure:
   productId
   categoryId
   color (may have many items)
   type (1, 2, 3)
add any other fields or tables if needed

For creating a custom model, I used Doctrine ORM
 https://pimcore.com/docs/platform/Pimcore/Extending_Pimcore/Custom_Persistent_Models/
https://github.com/IgorPr/test-task/blob/6feaf1cfd3c83105dac339a4eb46e1230609d5db/src/Entity

#### P.S. I couldn't run 'php bin/console make' perhaps I encountered a bug. That's why I wrote the code using the Doctrine manual.