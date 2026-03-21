          <table class="table table-striped">
              <tr>
                  <th>Név</th>
                  <td><?= htmlspecialchars($patient['name']) ?></td>
              </tr>
              <tr>
                  <th> Születési idő</th>
                  <td> <?= htmlspecialchars($patient['birth_date']) ?></td>
              </tr>
              <tr>
                  <th>Születési hely</th>
                  <td><?= htmlspecialchars($patient['birth_place']) ?></td>
              </tr>
              <tr>
                  <th>Anyja neve</th>
                  <td><?= htmlspecialchars($patient['mother_name']) ?></td>
              </tr>
              <tr>
                  <th>Lakcím</th>
                  <td><?= htmlspecialchars($patient['address']) ?></td>
              </tr>
              <tr>
                  <th>Diagnózis</th>
                  <td><?= htmlspecialchars($patient['diagnosis']) ?></td>
              </tr>
          </table>