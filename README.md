### 1. Override some existing method for any pimcore model with additional logic.

https://pimcore.com/docs/platform/2023.2/Pimcore/Extending_Pimcore/Overriding_Models/

https://github.com/IgorPr/test-task/blob/750eaf3c5f21477d9f357a3882cd4fcbceb3a21c/src/Model/ModernDocument.php#L7


### 2. Create custom model (not pimcore class, DAO approach) to be able to work with table Filters.
   Table Filters structure:
   productId
   categoryId
   color (may have many items)
   type (1, 2, 3)
add any other fields or tables if needed


https://pimcore.com/docs/platform/Pimcore/Extending_Pimcore/Custom_Persistent_Models/

https://github.com/IgorPr/test-task/blob/750eaf3c5f21477d9f357a3882cd4fcbceb3a21c/src/Model/Filter.php#L9

https://github.com/IgorPr/test-task/blob/750eaf3c5f21477d9f357a3882cd4fcbceb3a21c/src/Model/Filter/Dao.php#L8


### 3. Create implementation for override some existing service (pseudo code)
The configuration is a simple key / value map in your config/config.yaml using the key pimcore.models.class_overrides

https://github.com/IgorPr/test-task/blob/750eaf3c5f21477d9f357a3882cd4fcbceb3a21c/config/config.yaml#L28

https://github.com/IgorPr/test-task/blob/f3c104b022e5c954df7483ab8d9942208c6e2606/src/Model/DataObject/DebugService.php#L8