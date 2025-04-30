-- Create the `userlog` table
CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  UNIQUE KEY `unique_userEmail` (`userEmail`)  -- Add a unique key on userEmail
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Insert sample data into the `userlog` table
INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'anuj.k@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-22 06:01:21', '22-05-2024 11:34:34 AM', 1),
(2, 'johndeo@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-23 13:30:40', NULL, 1),
(3, 'amit12@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-05 01:03:33', '05-06-2024 06:39:31 AM', 1);
-- Add primary key for the `id` column
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

-- Set the `id` column to auto-increment
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
