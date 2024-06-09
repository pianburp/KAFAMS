<script>
const bcrypt = require('bcrypt');
const { User, Role, UserRole } = require('../models');

const register = async (req, res) => {
    const { username, email, password, role } = req.body;
    try {
        const hashedPassword = await bcrypt.hash(password, 10);
        const newUser = await User.create({ username, email, password: hashedPassword });

        const userRole = await Role.findOne({ where: { role_name: role } });
        await newUser.addRole(userRole);

        res.status(201).json({ message: 'User registered successfully' });
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
};

module.exports = { register };
</script>