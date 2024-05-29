### 1. Override some existing method for any pimcore model with additional logic.

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


### 3. Create implementation for override some existing service (pseudo code)